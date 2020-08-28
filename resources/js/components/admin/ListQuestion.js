import React from 'react';
import Tableau from "./Tableau";

const ListQuestion = (props) => {
    const title = "Liste des questions";
    return (
        <Tableau title={title} list={props.list} column="Type"/>
    );
};
export default ListQuestion;