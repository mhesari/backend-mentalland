import React from 'react';
import { Field, Formik } from 'formik';
import { Typography } from '@mui/material';

const Basic = () => (
  <div>
    
  <Typography sx={{fontFamily:'Alice',fontSize:{lg:"40px",xs:"28px"}, marginBottom:{md:"0px" , xs:"20px"} ,textAlign:"left"}}> Become One of Us</Typography>
  <Typography sx={{fontFamily:'Gilroy-Medium',fontSize:{lg:"19px",xs:"12px"},lineHeight:{md:"40px"}, width:{md:"1239px"} , height:{md:"240px"}, marginLeft:{md:"30px"}, marginBottom:{md:"18px" , xs:"20px"} ,textAlign:"left"}}>Lorem ipsum dolor sit amet consectetur. Viverra pellentesque volutpat quis in erat. Sit aenean eget nascetur mus non. Enim a ut vitae felis convallis. Egestas enim diam ac nisi orci id tellus lobortis. Lacus in etiam rhoncus.</Typography>
    <Formik
      initialValues={{name:"" , lastName : "", sex: "men", phoneNumber :"" , mobileNumber:"",addres : "" , postalCard : "" ,   email: '', password: '' }}
      validate={values => {
        const errors = {};
        if (!values.email) {
          errors.email = 'Required';
        } else if (
          !/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/i.test(values.email)
        ) {
          errors.email = 'Invalid email address';
        }
        return errors;
      }}
      onSubmit={(values, { setSubmitting }) => {
        setTimeout(() => {
          alert(JSON.stringify(values, null, 2));
          setSubmitting(false);
        }, 400);
      }}
    >
      {({
        values,
        errors,
        touched,
        handleChange,
        handleBlur,
        handleSubmit,
        isSubmitting,
        /* and other goodies */
      }) => (
        <form onSubmit={handleSubmit}>
        <label>Name</label>
        <Field
            type="text"
            name="Name"
            onChange={handleChange}
            onBlur={handleBlur}
          />
          <label>last Name</label>
            <Field
            type="text"
            name="lastName"
            onChange={handleChange}
            onBlur={handleBlur}
          />
          <label>Date of birth</label>
          <Field type="date" />
          <label>Email address</label>
          <Field
            type="email"
            name="email"
            onChange={handleChange}
            onBlur={handleBlur}
            value={values.email}
          />
          {errors.email && touched.email && errors.email}
          {/* <Field
            type="password"
            name="password"
            onChange={handleChange}
            onBlur={handleBlur}
            value={values.password}
          /> */}
          {errors.password && touched.password && errors.password}
          <button type="submit" disabled={isSubmitting}>
            Submit
          </button>
          <button type="reset" disabled={isSubmitting}>
            Cancel
          </button>
        </form>
      )}
    </Formik>
  </div>
);

export default Basic;