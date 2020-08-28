import React from 'react';

const Tableau = (props) => {

    return (
        <div className="tab py-3 px-3">
            <div className="card-header">
                <h5 className="card-title m-b-0">{props.title}</h5>
            </div>
            <div className="card-body">
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
                            <th scope="col">{(row.id % 20 === 0) ? 20 : row.id % 20}</th>
                            <th scope="col">{row.label}</th>
                            <th scope="col">{row.type ?? row.value}</th>
                        </tr>
                    ))}
                    </tbody>
                </table>
            </div>
        </div>
    );
};
export default Tableau;
