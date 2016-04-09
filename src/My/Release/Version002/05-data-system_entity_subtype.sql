SET search_path = public, pg_catalog;

-- Data for table public.tbl_system_entity_subtype
INSERT INTO tbl_system_entity_subtype
    (id, code, name, entity_type_id, default_status_id)
VALUES
    (11, 'email-token', 'Email token', 1, 11),
    (12, 'auth-token', 'Authentication token', 1, 11),

    (20, 'system-user', 'System user', 2, 21),
    (21, 'individual-user', 'Individual user', 2, 21),
    (22, 'company-user', 'Company user', 2, 21),

    (30, 'system-account', 'System account', 3, 31),
    (31, 'individual-account', 'Individual account', 3, 31),
    (32, 'retailer-account', 'Retailer account', 3, 31),
    (33, 'wholesaler-account', 'Wholesaler account', 3, 31),
    (34, 'supplier-account', 'Supplier account', 3, 31),

    (41, 'billing-address', 'Billing address', 4, 41),
    (42, 'delivery-address', 'Delivery address', 4, 41),
    (43, 'correspondence-address', 'Correspondence address', 4, 41),
    (44, 'registered-address', 'Registered address', 4, 41),

    (51, 'mobile-phone', 'Mobile', 5, 51),
    (52, 'landline-phone', 'Landline', 5, 51),
    (53, 'work-phone', 'Work', 5, 51),
    (54, 'other-phone', 'Other', 5, 51),

    (61, 'item-category', 'Item category', 6, 61),
    (62, 'buyer-category', 'Buyer category', 6, 61),
    (63, 'seller-category', 'Seller category', 6, 61),
    (64, 'order-category', 'Order category', 6, 61),
    (65, 'asset-category', 'Asset category', 6, 61),
    (66, 'page-category', 'Page category', 6, 61),

    (71, 'stock-item', 'Stock item', 7, 71),
    (72, 'service-item', 'Service item', 7, 71),

    (711, 'default-item_price', 'Item price', 71, 711),
    (721, 'default-item_cost', 'Item cost', 72, 721),

    --(81, 'default-basket', 'Basket', 8),

    (91, 'customer-order', 'Customer order', 9, 911),
    (92, 'retailer-order', 'Retailer order', 9, 921),
    (93, 'wholesaler-order', 'Wholesaler order', 9, 931),

    (101, 'customer-order-item', 'Customer order item', 10, 101),
    (102, 'retailer-order-item', 'Retailer order item', 10, 101),
    (103, 'wholesaler-order-item', 'Wholesaler order item', 10, 101),

    (111, 'image-asset', 'Image asset', 11, 111),
    (112, 'image-link-asset', 'Image link asset', 11, 111),
    (113, 'video-asset', 'Video asset', 11, 111),
    (114, 'video-link-asset', 'Video link asset', 11, 111),
    (115, 'document-asset', 'Document asset', 11, 111),
    (116, 'document-link-asset', 'Document link asset', 11, 111),

    (121, 'user-page', 'User page', 12, 121),
    (122, 'account-page', 'Account page', 12, 121)
;