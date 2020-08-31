import React, {useEffect, useState} from 'react';
import axios from "axios";
import logo from "../../../images/bigscreen_logo.png";

const AnswerPage = (props) => {
    const [answers, setAnswers] = useState([]);
    const [date, setDate] = useState();
    let listAnswers;
    let message;
    useEffect(() => {
        axios.post('/' + props.token).then(function (response) {
            setDate(response.data.date);
            setAnswers(response.data.data);
        }).catch(function (error) {
            console.log(error);
        });
    }, []);

    listAnswers = answers.map((answer, key) => {
            const title = 'Question ' + (key + 1) + '/20';
            return <div key={key} className='card question mb-5 py-3 '>
                <h3>{title}</h3>
                <label>{answer.label}</label>
                <section className='possible-choice py-2'>
                    {answer.answer}
                </section>
            </div>
        }
    );

    message = answers==[]?'Page introuvable':'Vous trouverez ci-dessous les réponses que vous avez apportées à notre sondage le ' + date;

    return (
        <div className="container py-3">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card" id="form-survey">
                        <div className="card-header">
                            <div className="col-md-12 logo">
                                <img src={logo} alt="BIG SCREEN"/>
                                <p>{message}</p>
                            </div>
                        </div>
                        <div className="card">
                            <div className="card-body wizard-content">
                                <div className="m-t-40">
                                    {listAnswers}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};
export default AnswerPage;
