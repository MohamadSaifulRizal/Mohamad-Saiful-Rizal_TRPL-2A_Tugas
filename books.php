<?php
header('Content-Type: application/xml');
$method = $_SERVER['REQUEST_METHOD'];

$books = [
    ["id" => 1, "title" => "Book 1", "author" => "Author 1"],
    ["id" => 2, "title" => "Book 2", "author" => "Author 2"]
];

if ($method == 'GET') {
    $xml = new SimpleXMLElement('<books/>');
    foreach ($books as $book) {
        $bookNode = $xml->addChild('book');
        $bookNode->addChild('id', $book['id']);
        $bookNode->addChild('title', $book['title']);
        $bookNode->addChild('author', $book['author']);
    }
    echo $xml->asXML();
} elseif ($method == 'POST') {
    $xmlData = file_get_contents('php://input');
    $xml = simplexml_load_string($xmlData);

    $newBook = [
        "id" => count($books) + 1,
        "title" => (string) $xml->title,
        "author" => (string) $xml->author
    ];
    array_push($books, $newBook);
    echo "<message>Book added successfully</message>";
} else {
    header("HTTP/1.1 405 Method Not Allowed");
}
?>
