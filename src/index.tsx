import React from "react";
import ReactDOM from "react-dom";
import { App } from "./Components/App";

const containers = document.querySelectorAll(".calc-plugin");
containers.forEach((container) => {
    const apiUrl = container.getAttribute('calcurl')
    ReactDOM.render(<App apiUrl={apiUrl} />, container);
});