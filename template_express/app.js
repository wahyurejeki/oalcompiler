require("dotenv").config();
const express = require("express");
const sequelize = require("./config/database");
const routes = require("./routes");

const app = express();
const PORT = process.env.PORT || 3000;

app.use(express.json());
app.use("/", routes);

// Sync Database and Start Server
sequelize
  .sync()
  .then(() => {
    console.log("Database connected & synced");
    app.listen(PORT, () => {
      console.log(`Server is running on http://localhost:${PORT}`);
    });
  })
  .catch((err) => {
    console.error("Unable to connect to the database:", err);
  });
