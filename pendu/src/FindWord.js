import React from 'react'

import './FindWord.css'

const FindWord = ({letter, letter_dotted, letters}) => (
    <span>
        {letters.map((letter_comparison) => {

            if(letter_comparison === letter)
            {
                letter_dotted = letter
                return null 
            }
                return null
        })}
        {letter_dotted}
    </span>
)

export default FindWord