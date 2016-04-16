SET search_path = public, pg_catalog;

-- Data for table public.tbl_system_entity_type
INSERT INTO tbl_system_entity_type
   (id, code, name, short_description)
VALUES
   (1, 'token', 'Token', 'Security tokens'),

   (2, 'user', 'User', 'Users'),
   (3, 'account', 'Account', 'Accounts'),

   (4, 'address', 'Address', 'Addresses'),
   (5, 'phone', 'Phone number', 'Phone numbers'),

   (6, 'category', 'Category', 'Entity categories'),

   (7, 'item', 'Item', 'Products and services'),
   (71, 'item_price', 'Prices of Items', 'Prices of products and services'),
   (72, 'item_cost', 'Costs of Items', 'Costs of products and services'),

   -- (8, 'basket', 'Basket', 'Basket of items before confirmation'),
   (9, 'order', 'Order', 'Orders'),
   (10, 'order_item', 'Order Item', 'Items in orders'),

   (11, 'asset', 'Asset', 'Assets e.g. image, document, video, etc.'),
   (12, 'page', 'Page', 'Web pages')
;
