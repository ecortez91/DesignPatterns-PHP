<?php
class KindleBookAPI 
{
    private $author;
    private $title;

    public function __construct(string $author_in, string $title_in) {
        $this->author = $author_in;
        $this->title = $title_in;
    }

    public function getAuthor() : string {
        return $this->author;
    }

    public function getTitle() : string {
        return $this->title;
    }
    
    public function getTitleAndAuthor() {
        return "Function no longer supported. Please see getTitle() and getAuthor()";
    }
} 

interface IKindleBookAPI 
{
    public function getTitleAndAuthor() : string;
}

class KindleBookAPIAdapter implements IKindleBookAPI 
{
    private $book;

    public function __construct(KindleBookAPI $book) {
        $this->book = $book;
    }

    public function getTitleAndAuthor() : string {
        return $this->book->getTitle() . " by " . $this->book->getAuthor();
    }
}

$kindle_book = new KindleBookAPIAdapter(new KindleBookAPI("Robert Martin (aka Uncle Bob)", "Agile Development"));
print_r($kindle_book->getTitleAndAuthor());
?>