import React, {useEffect, useState} from 'react';
import axios from "axios";
import Tableau from "./Tableau";

const ListQuestion = () => {
    const [list, setList] = useState([]);
    const title = "Liste des questions";

    useEffect(() => {
        axios.get('/questions').then(function (response) {
            setList(response.data);
        }).catch(function (error) {
            console.log(error);
        });
    }, []);

    return (
        <Tableau title={title} list={list} column="Type"/>
    );
};
export default ListQuestion;