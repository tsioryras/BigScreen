import React from 'react';
import SurveyFrom from './users/SurveyForm';

function App() {
    return (
        <div className="container my-5 py-3">
            <div className="row justify-content-center">
                <div className="col-md-8 offset-md-1">
                    <div className="card">
                        <div clssName="card-header">
                            <h1>Sondage de satisfaction</h1>
                        </div>
                        <div className="card-body">
                            <SurveyFrom/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default App;