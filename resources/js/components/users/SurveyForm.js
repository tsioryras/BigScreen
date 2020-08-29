import React, {useEffect, useState} from 'react';
import Question from './Question';
import axios from "axios";
import logo from "../../../images/bigscreen_logo_white.png";

const SurveyFrom = () => {

    const [data, setData] = useState([]);
    const [formData, setFormData] = useState([]);
    const [message, setMessage] = useState(null);
    useEffect(() => {
        axios.get('/questions').then(function (response) {
            setData(response.data);
        }).catch(function (error) {
            console.log(error);
        });
    }, []);

    const handleField = (event) => {
        const newData = {...formData};
        newData[event.target.name] = event.target.value;
        console.log(formData);
        setFormData(newData);
    };

    const onSendData = (event) => {
        console.log(formData);
        event.preventDefault();
        axios.post('/submit', formData)
            .then(function (response) {
                console.log(response);

            })
            .catch(function (error) {
                console.log(error);
                setMessage('Toutes les questions sont obligatoires !')
            });

    };

    const listQuestions = data.map((question, key)=> {
            const title = 'Question ' + (key + 1) + '/20';
            return <Question key={key} number={key + 1}
                             content={question}
                             type={question.type}
                             title={title}
                             onRespond={handleField}/>
        }
    );

    // const hasErrorFor = (field) => {
    //     return !!this.state.errors[field]
    // };
    //
    // const renderErrorFor = (field) => {
    //     if (hasErrorFor(field)) {
    //         return (
    //             <span className='invalid-feedback'>
    //           <strong>{this.state.errors[field][0]}</strong>
    //         </span>
    //         )
    //     }
    // };

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
                        <div className="card">
                            <div className="card-body wizard-content">
                                <form className="m-t-40" onSubmit={onSendData}>
                                    {listQuestions}
                                    <div className="row">
                                        <div className="offset-10">
                                            <button className="btn btn-success"
                                                    id="submit"
                                                    name="submit"
                                                    type="submit">
                                                Finaliser
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
};

export default SurveyFrom;