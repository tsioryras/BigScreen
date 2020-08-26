import ReactDOM from "react-dom";
import React from "react";
import App from "./App";
import Dashboard from "./Dashboard";

const formRenderElement = document.getElementById('root');
const adminRenderElement = document.getElementById('admin-page');

if (formRenderElement) {
    ReactDOM.render(<App/>, formRenderElement);
}

if (adminRenderElement) {
    ReactDOM.render(<Dashboard/>, adminRenderElement);
}
