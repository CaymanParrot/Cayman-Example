SET search_path = public, pg_catalog;


-- Data for table public.tbl_system_entity_status
INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (10, 'incomplete-user', 'Incomplete', 'Incomplete user account', NULL, 1);

INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (11, 'active-user', 'Active', 'Active user', NULL, 1);

INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (12, 'suspended-user', 'Suspended', 'Suspended user', NULL, 1);

INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (13, 'deleted-user', 'Deleted', 'Deleted user', NULL, 1);



INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (20, 'incomplete-company', 'Incomplete', 'Incomplete company account', NULL, 2);

INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (21, 'active-company', 'Active', 'Active company', NULL, 2);

INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (22, 'suspended-company', 'Suspended', 'Suspended company', NULL, 2);

INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (23, 'closed-company', 'Closed', 'Closed company account', NULL, 2);



INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (31, 'active-address', 'Active', 'Active address', NULL, 3);

INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (32, 'deleted-address', 'Old address', 'Old address', NULL, 3);



INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (41, 'active-phone', 'Active', 'Active phone number', NULL, 4);

INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (42, 'deleted-phone', 'Old phone number', 'Old phone number', NULL, 4);




INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (51, 'available-item', 'Available', 'Available item', NULL, 5);

INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (52, 'unavailable-item', 'Unavailable', 'Unavailable item', NULL, 5);

INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (53, 'discontinued-item', 'Discontinued', 'Discontinued item', NULL, 5);



INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (60, 'draft-page', 'Draft', 'Draft page', NULL, 6);

INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (61, 'published-page', 'Published', 'Published page', NULL, 6);



INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (70, 'draft-order', 'Draft', 'Draft order', NULL, 7);

INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (71, 'submitted-order', 'Submitted', 'Submitted order', NULL, 7);

INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (72, 'pricing-order', 'Pricing', 'Pricing order', NULL, 7);

INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (73, 'priced-order', 'Awaiting customer confirmation', 'Pricing done, awaiting customer confirmation', NULL, 7);

INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (74, 'confirmed-order', 'Customer confirmed', 'Order confirmed by customer', NULL, 7);

INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (75, 'in-progress-order', 'In Progress', 'Order in progress', NULL, 7);

INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (76, 'delivered-order', 'Delivered', 'Order delivered', NULL, 7);

INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (77, 'canceled-order', 'Canceled', 'Order canceled', NULL, 7);



INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (111, 'active-asset', 'Active', 'Active asset', NULL, 11);

INSERT INTO tbl_system_entity_status (id, code, name, short_description, long_description, entity_type_id)
VALUES (112, 'inactive-asset', 'Inactive', 'Inactive/broken asset', NULL, 11);
