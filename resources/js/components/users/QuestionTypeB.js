import React from 'react';

let input;
const QuestionTypeB = (props) => {
    if (props.input === 'textarea') {
        input = <textarea id={props.number} name={props.number} className="required  form-control"></textarea>;
    } else {
        input = <input id={props.number} name={props.number} type={props.type} className="required form-control"/>;
    }
    return (
        <div className={'card mb-5 py-2 ' + props.display}>
            <h3>{props.title}</h3>
            <section>
                <label htmlFor={props.number}>{props.label}</label>
                {input}
            </section>
        </div>
    );
};
export default QuestionTypeB;

