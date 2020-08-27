import React, {useState} from 'react';
import Question from './Question';
import axios from "axios";

const SurveyFrom = () => {

    const [data, setData] = useState([]);

    const dataGet = axios.get('/questions').then(function (response) {
        setData(response.data);
    }).catch(function (error) {
        console.log(error);
    });

    const listQuestions = data.map(function (question, key) {
            const title = 'Question ' + (key + 1) + '/20';
            return <Question key={key} number={key + 1}
                             content={question}
                             type={question.type}
                             title={title}/>
        }
    );

    return (
        <div className="card">
            <div className="card-body wizard-content">
                <form action="#" className="m-t-40">
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
    )
};

export default SurveyFrom;