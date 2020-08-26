import React, {useState} from 'react';
import Question from './Question';

const SurveyFrom = () => {
    const [data, setData] = useState([
        {
            label: 'votre email',
            type: 'B'
        },
        {
            label: 'nombre d\'enfants',
            choices: [1, 2, 3, 4, 5],
            type: 'C'
        }, {
            label: 'fruits',
            choices: ['banane', 'pomme de ciel', 'orange'],
            type: 'A'
        }
    ]);

    const totalQuestion = data.length;
    const [currentQuestion, setCurrentQuestion] = useState(0);
    const [end, setEnd] = useState('d-none');
    const [prev, setPrev] = useState('d-none');
    const [next, setNext] = useState('');

    const onSendData = (event) => {
        event.preventDefault();
        console.log(data);
    };

    const onNextQuestion = () => {
        setCurrentQuestion(currentQuestion + 1);
        if (currentQuestion >= totalQuestion - 2) {
            setCurrentQuestion(totalQuestion - 1);
            setNext('d-none');
            setEnd('');
        }
        setPrev('');
    }

    const onPrevQuestion = () => {
        setCurrentQuestion(currentQuestion - 1);
        console.log(currentQuestion);
        if (currentQuestion <= 1) {
            setCurrentQuestion(0);
            setPrev('d-none');
        }
        setEnd('d-none');
        setNext('');
    };

    const listQuestions = data.map(function (question, key) {
            // const display = key === currentQuestion ? 'card' : 'd-none';
            const title = 'Question ' + (key + 1) + '/20';
            return <Question key={key} number={key + 1}
                             content={question}
                             type={question.type}
                // display={display}
                             title={title}/>
        }
    );
    return (
        <div className="card">
            <div className="card-body wizard-content">
                <form id="example-form" action="#" className="m-t-40">
                    {listQuestions}
                    <div className="row">
                        <div className="offset-md-8">
                            <button className='btn btn-outline-success ' id="submit" name="submit"
                                    type="submit">Finaliser
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    )
};

export default SurveyFrom;