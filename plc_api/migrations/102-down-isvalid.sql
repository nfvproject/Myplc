ALTER TABLE nodes DROP COLUMN last_download; 
ALTER TABLE nodes DROP COLUMN last_pcu_reboot; 
ALTER TABLE nodes DROP COLUMN last_pcu_confirmation;

ALTER TABLE pcus DROP COLUMN last_updated timestamp without time zone;

ALTER TABLE interfaces DROP COLUMN last_updated timestamp without time zone;

DROP VIEW view_nodes;
CREATE OR REPLACE VIEW view_nodes AS
SELECT
nodes.node_id,
nodes.node_type,
nodes.hostname,
nodes.site_id,
nodes.boot_state,
nodes.run_level,
nodes.deleted,
nodes.model,
nodes.boot_nonce,
nodes.version,
nodes.verified,
nodes.ssh_rsa_key,
nodes.key,
CAST(date_part('epoch', nodes.date_created) AS bigint) AS date_created,
CAST(date_part('epoch', nodes.last_updated) AS bigint) AS last_updated,
CAST(date_part('epoch', nodes.last_contact) AS bigint) AS last_contact,  
peer_node.peer_id,
peer_node.peer_node_id,
COALESCE((SELECT interface_ids FROM node_interfaces 
		 WHERE node_interfaces.node_id = nodes.node_id), '{}') 
AS interface_ids,
COALESCE((SELECT nodegroup_ids FROM node_nodegroups 
		 WHERE node_nodegroups.node_id = nodes.node_id), '{}') 
AS nodegroup_ids,
COALESCE((SELECT slice_ids FROM node_slices 
		 WHERE node_slices.node_id = nodes.node_id), '{}') 
AS slice_ids,
COALESCE((SELECT slice_ids_whitelist FROM node_slices_whitelist 
		 WHERE node_slices_whitelist.node_id = nodes.node_id), '{}') 
AS slice_ids_whitelist,
COALESCE((SELECT pcu_ids FROM node_pcus 
		 WHERE node_pcus.node_id = nodes.node_id), '{}') 
AS pcu_ids,
COALESCE((SELECT ports FROM node_pcus
		 WHERE node_pcus.node_id = nodes.node_id), '{}') 
AS ports,
COALESCE((SELECT conf_file_ids FROM node_conf_files
		 WHERE node_conf_files.node_id = nodes.node_id), '{}') 
AS conf_file_ids,
COALESCE((SELECT node_tag_ids FROM node_tags 
		 WHERE node_tags.node_id = nodes.node_id), '{}') 
AS node_tag_ids,
node_session.session_id AS session
FROM nodes
LEFT JOIN peer_node USING (node_id)
LEFT JOIN node_session USING (node_id);

DROP VIEW view_pcus;
CREATE OR REPLACE VIEW view_pcus AS
SELECT
pcus.*,
COALESCE((SELECT node_ids FROM pcu_nodes WHERE pcu_nodes.pcu_id = pcus.pcu_id), '{}') AS node_ids,
COALESCE((SELECT ports FROM pcu_nodes WHERE pcu_nodes.pcu_id = pcus.pcu_id), '{}') AS ports
FROM pcus;


DROP VIEW view_interfaces;
CREATE OR REPLACE VIEW view_interfaces AS
SELECT
interfaces.interface_id,
interfaces.node_id,
interfaces.is_primary,
interfaces.type,
interfaces.method,
interfaces.ip,
interfaces.mac,
interfaces.gateway,
interfaces.network,
interfaces.broadcast,
interfaces.netmask,
interfaces.dns1,
interfaces.dns2,
interfaces.bwlimit,
interfaces.hostname,
COALESCE((SELECT interface_tag_ids FROM interface_tags WHERE interface_tags.interface_id = interfaces.interface_id), '{}') AS interface_tag_ids
FROM interfaces;

