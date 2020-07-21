import React from 'react'
import propTypes from 'prop-types'

import './LetterKeyboard.css'

const LetterKeyboard = ({letter, id, isDisabled, onClick}) => (
    <article className={`letterBox`}>
       <button type="button" disabled= { isDisabled } onClick = {() => onClick(letter)} className="letter" id={id}>
            {letter}
       </button> 
    </article>
    
)

LetterKeyboard.propTypes = {
    letter : propTypes.string.isRequired,
}

export default LetterKeyboard