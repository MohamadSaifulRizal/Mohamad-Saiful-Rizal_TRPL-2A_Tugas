import fetch from 'node-fetch';
import xml2js from 'xml2js';

fetch('http://localhost:3000/books')
  .then(response => response.json())
  .then(data => {
    const builder = new xml2js.Builder();
    const xml = builder.buildObject({ books: data });
    console.log(xml);
  })
  .catch(error => console.error('Error:', error));
