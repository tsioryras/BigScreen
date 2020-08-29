import React from 'react';
import Tableau from "./Tableau";

const ListQuestion = (props) => {
    return (
        <div className="py-3 px-3">
            <div className="card-header">
                <h5 className="card-title m-b-0">Liste des questions</h5>
            </div>
            <Tableau title="" list={props.list} column="Type"/>
        </div>
    );
};
export default ListQuestion;