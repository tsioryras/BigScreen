import React from 'react';

const QuestionTypeAC = (props) => {

    const listOptions = props.options.map((optionValue, index) => {
        return <div key={index} className="form-group row">
            <div className="col-md-9">
                <div className="custom-control custom-radio">
                    <input type="radio" className="custom-control-input" name={'field' + props.number}
                           id={'question' + props.number + '_' + index}
                           value={optionValue}
                           onChange={props.onRespond}
                           onLoad={props.onRespond}
                           required/>
                    <label className="custom-control-label" htmlFor={'question' + props.number + '_' + index}>
                        {optionValue}</label>
                </div>
            </div>
        </div>
    });
    return (
        <div className={'card question mb-5 py-3 ' + props.display}>
            <h3>{props.title}</h3>
            <label>{props.label}</label>
            <section className={'possible-choice py-2'}>
                {listOptions}
            </section>
        </div>
    );
};
export default QuestionTypeAC;

