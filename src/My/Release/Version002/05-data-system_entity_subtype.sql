SET search_path = public, pg_catalog;

-- Data for table public.tbl_system_entity_subtype
INSERT INTO tbl_system_entity_subtype (id, code, name, entity_type_id)

    (11, 'email-token', 'Email token', 1),
    (12, 'auth-token', 'Authentication token', 1),

    (20, 'system-user', 'System user', 2),
    (21, 'buyer-user', 'Buyer user', 2),
    (22, 'seller-user', 'Seller user', 2),

    (30, 'system-company', 'System company', 3),
    (31, 'retailer-company', 'Retailer', 3),
    (32, 'wholesaler-company', 'Wholesaler', 3),
    (33, 'supplier-company', 'Supplier company', 3),

    (41, 'billing-address', 'Billing address', 4),
    (42, 'delivery-address', 'Delivery address', 4),
    (43, 'correspondence-address', 'Correspondence address', 4),
    (44, 'registered-address', 'Registered address', 4),

    (51, 'mobile-phone', 'Mobile', 5),
    (52, 'landline-phone', 'Landline', 5),
    (53, 'work-phone', 'Work', 5),
    (54, 'other-phone', 'Other', 5),

    (61, 'item-category', 'Item category', 6),
    (62, 'buyer-category', 'Buyer category', 6),
    (63, 'seller-category', 'Seller category', 6),
    (64, 'order-category', 'Order category', 6),
    (65, 'asset-category', 'Asset category', 6),
    (66, 'page-category', 'Page category', 6),

    (71, 'stock-item', 'Stock item', 7),
    (72, 'service-item', 'Service item', 7),

    (81, 'default-basket', 'Basket', 8),

    (91, 'customer-order', 'Customer order', 9),
    (92, 'retailer-order', 'Retailer order', 9),
    (93, 'wholesaler-order', 'Wholesaler order', 9),

    (101, 'customer-order-item', 'Customer order item', 10),
    (102, 'retailer-order-item', 'Retailer order item', 10),
    (103, 'wholesaler-order-item', 'Wholesaler order item', 10),

    (111, 'image-asset', 'Image asset', 11),
    (112, 'image-link-asset', 'Image link asset', 11),
    (113, 'video-asset', 'Video asset', 11),
    (114, 'video-link-asset', 'Video link asset', 11),
    (115, 'document-asset', 'Document asset', 11),
    (116, 'document-link-asset', 'Document link asset', 11),

    (121, 'user-page', 'User page', 12),
    (122, 'account-page', 'Account page', 12),
;