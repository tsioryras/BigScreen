import React from 'react';
import Tableau from "./Tableau";

const ListAnswer = (props) => {
    const title = "Liste des réponses";
    const list = props.list;
    let results = [];

    for (let i in list) {
        results.push(<div key={i} className="card tab">
            <Tableau title={parseInt(i) + 1 + '.'} list={list[i]} column="Réponse"/>
        </div>);
    }

    return (
        <div className="content py-3 px-3">
            <div className="card-header">
                <h5 className="card-title m-b-0">{title}</h5>
            </div>
            {results}
        </div>
    );
};
export default ListAnswer;