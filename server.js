import express from 'express';

const app = express();
const port = 3000;

app.use(express.json());

const books = [
  { id: 1, title: 'Book 1', author: 'Author 1' },
  { id: 2, title: 'Book 2', author: 'Author 2' }
];

app.get('/books', (req, res) => {
  res.json(books);
});

app.post('/books', (req, res) => {
  const newBook = req.body;
  newBook.id = books.length + 1;
  books.push(newBook);
  res.status(201).json(newBook);
});

app.listen(port, () => {
  console.log(`Server berjalan di http://localhost:${port}`);
});
