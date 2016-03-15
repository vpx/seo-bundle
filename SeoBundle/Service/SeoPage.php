<?php
namespace VPX\SeoBundle\Service;

/**
 * @author Vitalii Piskovyi <vitalii.piskovyi@gmail.com>
 */
class SeoPage implements SeoPageInterface
{
    /**
     * @var string
     */
    protected $additionalTitle;

    /**
     * @var string
     */
    protected $defaultTitle;

    /**
     * @var string
     */
    protected $delimiter;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $keywords;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var string
     */
    protected $linkCanonical;

    /**
     * @var array
     */
    protected $alternates;

    /**
     * @var string
     */
    protected $h1;

    /**
     * @var array
     */
    protected $metaTags;

    /**
     * @param $defaultTitle
     * @param string $additionalTitle
     * @param string $delimiter
     */
    public function __construct($defaultTitle, $additionalTitle = null, $delimiter = '|')
    {
        $this->defaultTitle    = $defaultTitle;
        $this->additionalTitle = $additionalTitle;
        $this->delimiter       = $delimiter;

        $this->setLinkCanonical('');
        $this->setAlternates([]);
        $this->setMetaTags([]);
    }

    /**
     * {@inheritdoc}
     */
    public function getTitle()
    {
        return sprintf('%s%s', $this->title ? $this->title : $this->defaultTitle, $this->getAdditionalTitle());
    }

    /**
     * {@inheritdoc}
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * {@inheritdoc}
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getLinkCanonical()
    {
        return $this->linkCanonical;
    }

    /**
     * {@inheritdoc}
     */
    public function setLinkCanonical($linkCanonical)
    {
        $this->linkCanonical = $linkCanonical;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getAlternates()
    {
        return $this->alternates;
    }

    /**
     * {@inheritdoc}
     */
    public function setAlternates(array $alternates)
    {
        $this->alternates = $alternates;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addAlternate($lang, $link)
    {
        $this->alternates[$lang] = $link;
    }

    /**
     * {@inheritdoc}
     */
    public function getH1()
    {
        return $this->h1;
    }

    /**
     * {@inheritdoc}
     */
    public function setH1($h1)
    {
        $this->h1 = $h1;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getMetaTags()
    {
        return $this->metaTags;
    }

    /**
     * {@inheritdoc}
     */
    public function setMetaTags(array $metaTags)
    {
        $this->metaTags = $metaTags;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function addMetaTag($property, $content)
    {
        $this->metaTags[$property] = $content;
    }

    /**
     * @return string
     */
    private function getAdditionalTitle()
    {
        return $this->additionalTitle ? sprintf(' %s %s', $this->delimiter, $this->additionalTitle) : '';
    }
}
