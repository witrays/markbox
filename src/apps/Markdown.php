<?php
/**
* 类 Posts 提供了 Markbox 的 md 文件管理功能。
*
* @link http://github.com/tmkook/markbox
*
* @copyright (c) 2016 tmkook.
* @license MIT
*
* @version $Id: Category.php
*/
class Posts
{
    private $category;
    private $filename;
    private $text;
    public function __construct(Category $category, $filename)
    {
        $this->category = $category;
        $this->filename = $filename;
    }

    public function addText($text)
    {
        $this->text = $text;
    }

    public function save()
    {
        return $this->category->getFolder()->addFile($this->filename, $this->text);
    }

    // return parsedown html string
    public function parsedown()
    {
        $md = $this->category->getFolder()->getFile($this->filename);
        $parse = new Parsedown();

        return $markdown = $parse->text($md);
    }
}
