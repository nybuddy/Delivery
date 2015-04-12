Implement a class that can determine whether an order is paid in full. An order consists of

one or more items and one or more payments. Make sure you add appropriate error

handling, exception handling, logging, and assertions as appropriate. Your implementation

should reflect how you would approach this problem, what additional classes you think are

necessary, what design patterns would be helpful, and any other considerations for the

purpose of demonstrating your understanding of best practices and e­commerce

considerations.

interface ItemInterface

{

/**

* @return int The price of the individual item

*/

public function getAmount();

}

interface PaymentInterface

{

/**

* @return int The amount of the individual payment

*/

public function getAmount();

}

interface OrderInterface

{

/**

* @param ItemInterface $item An item that is part of the order

*/

public function addItem(ItemInterface $item);

/**

* @param PaymentInterface $payment A payment that has been applied to the order

*/

public function addPayment(PaymentInterface $payment);

/**

* @return bool true if the order has been paid in full, false if not.

*/

public function isPaidInFull();

}
