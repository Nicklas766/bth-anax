<?php

namespace Anax\Book;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;
use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;
use \Anax\Book\HTMLForm\CreateForm;
use \Anax\Book\HTMLForm\EditForm;
use \Anax\Book\HTMLForm\DeleteForm;
use \Anax\Book\HTMLForm\UpdateForm;

/**
 * A controller class.
 */
class BookController implements
    ConfigureInterface,
    InjectionAwareInterface
{
    use ConfigureTrait, InjectionAwareTrait;



    /**
     * @var $data description
     */
    //private $data;



    /**
     * Show all items.
     *
     * @return void
     */
    public function getIndex()
    {
        $book = new Book();
        $book->setDb($this->di->get("db"));

        $views = [
            ["book/crud/view-all", ["items" => $book->findAll()], "main"]
        ];

        $this->di->get("pageRender")->renderPage([
            "views" => $views,
            "title" => "A collection of items"
        ]);
    }



    /**
     * Handler with form to create a new item.
     *
     * @return void
     */
    public function getPostCreateItem()
    {
        $form = new CreateForm($this->di);
        $form->check();

        $views = [
            ["book/crud/create", ["form" => $form->getHTML()], "main"]
        ];

        $this->di->get("pageRender")->renderPage([
            "views" => $views,
            "title" => "Create a item"
        ]);
    }



    /**
     * Handler with form to delete an item.
     *
     * @return void
     */
    public function getPostDeleteItem()
    {
        $title      = "Delete an item";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $form       = new DeleteForm($this->di);

        $form->check();

        $data = [
            "form" => $form->getHTML(),
        ];

        $view->add("book/crud/delete", $data);

        $pageRender->renderPage(["title" => $title]);
    }



    /**
     * Handler with form to update an item.
     *
     * @return void
     */
    public function getPostUpdateItem($id)
    {
        $title      = "Update an item";
        $view       = $this->di->get("view");
        $pageRender = $this->di->get("pageRender");
        $form       = new UpdateForm($this->di, $id);

        $form->check();

        $data = [
            "form" => $form->getHTML(),
        ];

        $view->add("book/crud/update", $data);

        $pageRender->renderPage(["title" => $title]);
    }
}
