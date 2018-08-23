import React from 'react';
import ReactDOM from 'react-dom';
import { StripeProvider, Elements } from 'react-stripe-elements';

import InjectedCheckoutForm from './CheckoutForm';

const StripeMount = () => (
  <StripeProvider apiKey="pk_test_12345">
    <Elements>
      <InjectedCheckoutForm />
    </Elements>
  </StripeProvider>
);

if (document.getElementById('StripeMount')) {
  ReactDOM.render(<StripeMount />, document.getElementById('StripeMount'));
}