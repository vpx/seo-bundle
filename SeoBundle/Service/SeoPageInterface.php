<?php
namespace VPX\SeoBundle\Service;

/**
 * @author Vitalii Piskovyi <vitalii.piskovyi@gmail.com>
 */
interface SeoPageInterface
{
    /**
     * @return string
     */
    public function getTitle();

    /**
     * @param string $title
     *
     * @return SeoPageInterface
     */
    public function setTitle($title);

    /**
     * @return string
     */
    public function getKeywords();

    /**
     * @param string $keywords
     *
     * @return SeoPageInterface
     */
    public function setKeywords($keywords);

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @param string $description
     *
     * @return SeoPageInterface
     */
    public function setDescription($description);

    /**
     * @return string
     */
    public function getLinkCanonical();

    /**
     * @param string $linkCanonical
     *
     * @return SeoPageInterface
     */
    public function setLinkCanonical($linkCanonical);

    /**
     * @return array
     */
    public function getAlternates();

    /**
     * @param array $alternates
     *
     * @return SeoPageInterface
     */
    public function setAlternates(array $alternates);

    /**
     * @param string $lang
     * @param string $link
     */
    public function addAlternate($lang, $link);

    /**
     * @return string
     */
    public function getH1();

    /**
     * @param string $h1
     *
     * @return SeoPageInterface
     */
    public function setH1($h1);

    /**
     * @return array
     */
    public function getMetaTags();

    /**
     * @param array $metaTags
     *
     * @return SeoPageInterface
     */
    public function setMetaTags(array $metaTags);

    /**
     * @param string $property
     * @param string $content
     */
    public function addMetaTag($property, $content);
}
