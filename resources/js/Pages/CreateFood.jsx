import React, { useState } from 'react';
import Select from 'react-select';
import GuestLayout from '../components/layouts/GuestLayout';
import { useForm } from '@inertiajs/react';
import FormGroup from '../components/FormGroup';


//state variable to store the currently selected food item and weight
//set to null for non selected at first
//food from dropdown is selected from the foods array

const CreateFood = ({ foods }) => {
  const [selectedFood, setSelectedFood] = useState(null);
  const [weight, setWeight] = useState('');

  //food array of objects (parameters label and value)
  const foodOptions = foods?.map((food) => ({
    label: food.product,
    value: food.id,
  }));

  //events handling
  const handleWeightChange = (e) => {
    setWeight(e.target.value);
  };

  const handleFoodChange = (selectedOption) => {
    setSelectedFood(selectedOption);
  };

  const handleSubmit = (e) => {
    e.preventDefault();
   
    post('/create-food', {
        foodId: selectedFood,
        weight: weight,
  })
   

  };
//needs input from user where they tpe//useForm (intertia) to store in back - dailyrecords
  return (
    <>
      <form onSubmit={handleSubmit}>
        <div>
          <label>Select Food:</label>
          <Select
            options={foodOptions}
            value={selectedFood}
            onChange={handleFoodChange}
          />
        </div>
        <div>
          <label>Enter Weight (grams):</label>
          <input
            type="number"
            value={weight}
            onChange={handleWeightChange}
          />
        </div>
        <div>
          <button type="submit">Submit</button>
        </div>
      </form>
    </>
  );
};

export default CreateFood;


CreateFood.layout = page => <GuestLayout children={page} title="Create food" />


