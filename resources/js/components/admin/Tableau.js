import React from 'react';

const Tableau = (props) => {
    return (
        <div>
            <div className="row">
                <div className="col-12">
                    <div className="card">
                        <div className="card-body">
                            <h5 className="card-title m-b-0">{props.title}</h5>
                        </div>
                        <table className="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Label</th>
                                <th scope="col">{props.column}</th>
                            </tr>
                            </thead>
                            <tbody>
                            {props.list.map(row => (
                                <tr key={row.id}>
                                    <th scope="col">{row.id}</th>
                                    <th scope="col">{row.label}</th>
                                    <th scope="col">{row.type}</th>
                                </tr>
                            ))}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    );
};
export default Tableau;
