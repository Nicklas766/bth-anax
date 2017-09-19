<?php

namespace Nicklas\Comment2\User;

/**
 * Trait implementing reading from config-file and storing options in
 * $this->config.
 */
trait ParserTrait
{
    /**
     * Returns gravatar link
     *
     * @param string $email
     *
     * @return string as gravatar link
     */
    public function gravatar($email)
    {
        return "https://www.gravatar.com/avatar/" . md5(strtolower(trim($email))) . "&s=" . 40;
    }

    /**
     * Return markdown based on string
     *
     * @param string $content unparsed markdown
     *
     * @return string as parsed markdown
     */
    // public function getMD($content)
    // {
    //     return $this->di->get('textfilter')->parse($content, ["yamlfrontmatter", "shortcode", "markdown", "titlefromheader"])->text;
    // }
}
