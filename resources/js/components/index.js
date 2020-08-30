import ReactDOM from "react-dom";
import React from "react";
import App from "./App";
import Dashboard from "./Dashboard";
import AnswerPage from "./users/AnswerPage";
import '../../css/custom.css';

const formRenderElement = document.getElementById('root');
const adminRenderElement = document.getElementById('admin-page');
const answerRenderElement = document.getElementById('answer-page');

if (formRenderElement) {
    ReactDOM.render(<App/>, formRenderElement);
}

if (answerRenderElement) {
    ReactDOM.render(<AnswerPage token={answerRenderElement.getAttribute('data-token')}/>, answerRenderElement);
}

if (adminRenderElement) {
    ReactDOM.render(<Dashboard/>, adminRenderElement);
}
