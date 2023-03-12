import React from 'react'
interface Props {
  operationResult: string
}
export default function ScreenCalc({ operationResult }: Props) {
  return (
    <div className='calc-screen'>{operationResult}</div>
  )
}
