<?php

interface NyTimesMention
{
    /**
     * URL of the mention
     *
     * @return string
     */
    public function getUrl();

    /**
     * Title of the mention
     *
     * @return string
     */
    public function getTitle();

    /**
     * Creation date of the mention
     *
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * Content of the mention
     *
     * @return string
     */
    public function getContent();

    /**
     * Get thumbnail URL of the mention if present, null if absent
     *
     * @return string|null
     */
    public function getThumbnail();

}

