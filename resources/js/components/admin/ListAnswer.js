import React, {useEffect, useState} from 'react';
import axios from "axios";
import Tableau from "./Tableau";

const ListAnswer = () => {
    const [list, setList] = useState([]);
    const title = "Liste des réponses";

    useEffect(() => {
        axios.get('/questions').then(function (response) {
            setList(response.data);
        }).catch(function (error) {
            console.log(error);
        });
    }, []);

    return (
        <Tableau title={title} list={list} column="Réponse"/>
    );
};
export default ListAnswer;