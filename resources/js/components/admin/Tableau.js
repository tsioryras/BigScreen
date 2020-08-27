import React from 'react';

let rows;
const Tableau = (props) => {
    // props.list.forEach(question => {
    //     // rows+= `<tr>
    //     //             <th scope="col">#</th>
    //     //             <th scope="col">Label</th>
    //     //             <th scope="col">Type</th>
    //     //         </tr>`;
    // });
    return (
        <div>
            <div className="row">
                <div className="col-12">
                    <div className="card">
                        <div className="card-body">
                            <h5 className="card-title m-b-0">{props.title}</h5>
                        </div>
                        <table className="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Label</th>
                                <th scope="col">Type</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    );
};
export default Tableau;
