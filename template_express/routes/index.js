const express = require("express");
const router = express.Router();

const BookController = require("../controllers/BookController");

router.get("/books", BookController.indexAction);

module.exports = router;
