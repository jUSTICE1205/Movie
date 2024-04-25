import React, { useState } from "react";

/** Components */
const Card = ({ children }) => (
  <div className="card">
    {/*<div className="waves">
    </div>*/}
    {children}
  </div>
);

const Form = ({ children }) => <form className="form">{children}</form>;

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
    e.preventDefault();
    try {
      const response = await fetch("http://localhost:81/movie/contact.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(formData),
      });
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      const data = await response.text();
      console.log(data);
      // Handle successful response
    } catch (error) {
      console.error("There was an error with the fetch operation:", error);
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
