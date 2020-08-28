import React, {useEffect, useState} from 'react';
import axios from "axios";
import Tableau from "./Tableau";

const ListAnswer = () => {
    const [list, setList] = useState([]);
    const title = "Liste des réponses";
    let results = [];
    useEffect(() => {
        axios.get('/administration/answers').then(function (response) {
            setList(response.data);
        }).catch(function (error) {
            console.log(error);
        });
    }, []);

    for (let i in list) {
        results.push(<div key={i} className="card">
            <Tableau title={parseInt(i) + 1 + '.'} list={list[i]} column="Réponse"/>
        </div>);
    }

    return (
        <div>
            <div className="row">
                <div className="col-12">
                    <div className="card">
                        <div className="card-body">
                            <h5 className="card-title m-b-0">{title}</h5>
                        </div>
                        {results}
                    </div>
                </div>
            </div>
        </div>
    );
};
export default ListAnswer;