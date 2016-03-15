<?php
namespace VPX\SeoBundle\Twig\Extension;

use VPX\SeoBundle\Service\SeoPageInterface;

/**
 * @author Vitalii Piskovyi <vitalii.piskovyi@gmail.com>
 */
class SeoPageExtension extends \Twig_Extension
{
    /**
     * @var SeoPageInterface
     */
    protected $page;

    /**
     * @param SeoPageInterface $page
     */
    public function __construct(SeoPageInterface $page)
    {
        $this->page = $page;
    }

    /**
     * {@inheritdoc}
     */
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('vpx_seo_set_title', [$this, 'setTitle']),
            new \Twig_SimpleFunction('vpx_seo_title', [$this, 'getTitle'], ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('vpx_seo_description', [$this, 'getDescription'], ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('vpx_seo_keywords', [$this, 'getKeywords'], ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('vpx_seo_canonical', [$this, 'getCanonical'], ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('vpx_seo_alternates', [$this, 'getAlternates'], ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('vpx_seo_h1', [$this, 'getH1'], ['is_safe' => ['html']]),
            new \Twig_SimpleFunction('vpx_seo_meta_tags', [$this, 'getMetaTags'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'vpx_seo';
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->page->setTitle($title);
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return strip_tags($this->page->getTitle());
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return sprintf('<meta name="description" content="%s"/>', strip_tags($this->page->getDescription()));
    }

    /**
     * @return string
     */
    public function getKeywords()
    {
        return sprintf('<meta name="keywords" content="%s"/>', strip_tags($this->page->getKeywords()));
    }

    /**
     * @return string
     */
    public function getCanonical()
    {
        if ($this->page->getLinkCanonical()) {
            return sprintf('<link rel="canonical" href="%s"/>', $this->page->getLinkCanonical());
        }

        return '';
    }

    /**
     * @return string
     */
    public function getAlternates()
    {
        $html = [];

        foreach ($this->page->getAlternates() as $lang => $link) {
            if ($lang == 'en') {
                $html[] = sprintf('<link rel="alternate" hreflang="x-default" href="%s">', $link);
            }

            $html[] = sprintf('<link rel="alternate" href="%s" hreflang="%s"/>', $link, $lang);
        }

        return $this->joinValues($html);
    }

    /**
     * @return string
     */
    public function getH1()
    {
        return $this->page->getH1();
    }

    /**
     * @return string
     */
    public function getMetaTags()
    {
        $html = [];

        $metaTags = $this->page->getMetaTags();

        if (count($metaTags) > 0) {
            foreach ($metaTags as $property => $content) {
                $html[] = sprintf('<meta property="%s" content="%s">', $property, $content);
            }
        }

        return $this->joinValues($html);
    }

    /**
     * @param array $html
     *
     * @return string
     */
    private function joinValues(array $html)
    {
        return implode("\n", $html);
    }
}
