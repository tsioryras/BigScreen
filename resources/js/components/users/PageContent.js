import React from 'react';
import SurveyFrom from "./SurveyForm";
import logo from "../../../images/bigscreen_logo_white.png";

const PageContent = () => {
    return (
        <div className="container py-3">
            <div className="row justify-content-center">
                <div className="col-md-8 offset-md-1">
                    <div className="card" id="form-survey">
                        <div className="card-header">
                            <div className="col-md-12 logo">
                                <img src={logo} alt="BIG SCREEN"/>
                                <p>Merci de répondre à toutes les questions et de valider le formulaire en bas de
                                    page</p>
                            </div>
                        </div>
                        <SurveyFrom/>
                    </div>
                </div>
            </div>
        </div>
    );
};
export default PageContent;