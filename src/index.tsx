import React from "react";
import ReactDOM from "react-dom";
import { App } from "./Components/App";

const containers = document.querySelectorAll(".calc-plugin");
containers.forEach((container) => {
    ReactDOM.render(<App />, container);
});