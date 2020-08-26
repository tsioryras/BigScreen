import React from 'react';
import QuestionTypeB from "./QuestionTypeB";
import QuestionTypeAC from "./QuestionTypeAC";

const Question = (props) => {
    if (props.type === 'B') {
        return <QuestionTypeB display={props.display} number={props.number} title={props.title}
                              label={props.content.label} type={props.input}/>;
    } else {
        return <QuestionTypeAC display={props.display} number={props.number} options={props.content.choices}
                               title={props.title} label={props.content.label}/>;
    }
};

export default Question;