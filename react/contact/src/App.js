import React, { useState } from "react";
import axios from "axios"; // Import Axios

/** Components */
const Card = ({ children }) => (
  <div className="card">
    {/*<div className="waves">
    </div>*/}
    {children}
  </div>
);

const Form = (
  { children, onSubmit } // Pass onSubmit prop to Form
) => (
  <form className="form" onSubmit={onSubmit}>
    {children}
  </form>
);

const TextInput = ({ name, label, value, onChange }) => (
  <div className="text-input">
    <label className={value ? "label-focus" : ""} htmlFor={name}>
      {label}
    </label>
    <input
      className={value ? "input-focus" : ""}
      type="text"
      name={name}
      value={value}
      onChange={onChange}
      required // adding required attribute
    />
  </div>
);

const TextArea = ({ name, label, value, onChange }) => (
  <div className="text-area">
    <label className={value ? "label-focus" : ""} htmlFor={name}>
      {label}
    </label>
    <textarea
      className={value ? "input-focus" : ""}
      name={name}
      value={value}
      onChange={onChange}
      required // adding required attribute
    />
  </div>
);

const Button = ({ children }) => <button className="button">{children}</button>;

const App = () => {
  const [formData, setFormData] = useState({
    name: "",
    email: "",
    message: "",
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setFormData((prevState) => ({
      ...prevState,
      [name]: value,
    }));
  };

  const handleSubmit = async (e) => {
    try {
      const url = "http://localhost:81/movie/contact.php";
      let fdata = new FormData();
      // fdata.append("name", formData[0]);
      // fdata.append("email", formData[1]);
      // fdata.append("message", formData[2]);
      fdata.append("name", formData.name);
      fdata.append("email", formData.email);
      fdata.append("message", formData.message);
      axios.post(url, fdata);
    } catch (error) {
      console.error("There was an error with the Axios request:", error);
    }
  };

  return (
    <div className="container">
      <Card>
        <h1>Contact Us</h1>
        <Form onSubmit={handleSubmit}>
          <TextInput
            name="name"
            label="Name"
            value={formData.name}
            onChange={handleChange}
          />
          <TextInput
            name="email"
            label="Email"
            value={formData.email}
            onChange={handleChange}
          />
          <TextArea
            name="message"
            label="Message"
            value={formData.message}
            onChange={handleChange}
          />
          <Button type="submit">Send</Button>
        </Form>
      </Card>
    </div>
  );
};

export default App;
