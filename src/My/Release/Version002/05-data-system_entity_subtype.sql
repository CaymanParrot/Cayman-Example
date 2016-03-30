SET search_path = public, pg_catalog;


-- Data for table public.tbl_system_entity_subtype
INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (11, 'individual-user', 'Individual user', NULL, NULL, 1);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (12, 'company-user', 'Company user', NULL, NULL, 1);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (13, 'system-user', 'System user', NULL, NULL, 1);


INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (21, 'retailer-company', 'Retailer', NULL, NULL, 2);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (22, 'wholesaler-company', 'Wholesaler', NULL, NULL, 2);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (23, 'supplier-company', 'Supplier company', NULL, NULL, 2);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (24, 'system-company', 'System company', NULL, NULL, 2);


INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (31, 'billing-address', 'Billing address', NULL, NULL, 3);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (32, 'delivery-address', 'Delivery address', NULL, NULL, 3);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (33, 'correspondence-address', 'Correspondence address', NULL, NULL, 3);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (34, 'registered-address', 'Registered address', NULL, NULL, 3);


INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (41, 'mobile-phone', 'Mobile', NULL, NULL, 4);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (42, 'landline-phone', 'Landline', NULL, NULL, 4);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (43, 'work-phone', 'Work', NULL, NULL, 4);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (44, 'other-phone', 'Other', NULL, NULL, 4);


INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (51, 'stock-item', 'Stock item', NULL, NULL, 5);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (52, 'service-item', 'Service item', NULL, NULL, 5);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (53, 'digital-item', 'Digital item', NULL, NULL, 5);


INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (61, 'user-page', 'User page', NULL, NULL, 6);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (62, 'company-page', 'Company page', NULL, NULL, 6);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (63, 'system-page', 'System page', NULL, NULL, 6);


INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (71, 'user-order', 'User order', NULL, NULL, 7);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (72, 'retailer-order', 'Retailer order', NULL, NULL, 7);


INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (81, 'order-item', 'Order item', NULL, NULL, 8);


INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (91, 'email-token', 'Email token', NULL, NULL, 9);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (92, 'auth-token', 'Authentication token', NULL, NULL, 9);


INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (111, 'image-asset', 'Image asset', NULL, NULL, 11);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (115, 'document-asset', 'Document asset', NULL, NULL, 11);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (113, 'video-asset', 'Video asset', NULL, NULL, 11);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (112, 'image-link-asset', 'Image link asset', NULL, NULL, 11);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (114, 'video-link-asset', 'Video link asset', NULL, NULL, 11);

INSERT INTO tbl_system_entity_subtype (id, code, name, short_description, long_description, entity_type_id)
VALUES (116, 'document-link-asset', 'Document link asset', NULL, NULL, 11);
