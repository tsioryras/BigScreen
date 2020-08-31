import React from 'react';

let input;
const QuestionTypeB = (props) => {
    if (props.type === 'textarea') {
        input = <textarea id={props.number} name={'field' + props.number} className="  form-control"
                          placeholder="Saississez votre réponse"
                          onChange={props.onRespond}
                          onLoad={props.onRespond}
                          required></textarea>;
    } else {
        input =
            <input id={props.number}
                   name={'field' + props.number}
                   type={props.type} className=" form-control"
                   onChange={props.onRespond}
                   onLoad={props.onRespond}
                   required/>;
    }
    return (
        <div className={'card question mb-5 py-2 ' + props.display}>
            <h3>{props.title}</h3>
            <section className={'mb-3 py-2'}>
                <label htmlFor={props.number}>{props.label}</label>
                {input}
            </section>
        </div>
    );
};
export default QuestionTypeB;

