#!/bin/bash
sudo "/usr/share/opensearch/plugins/opensearch-security/tools/securityadmin.sh" -cd "/etc/opensearch/opensearch-security" -icl -key "/etc/opensearch/kirk-key.pem" -cert "/etc/opensearch/kirk.pem" -cacert "/etc/opensearch/root-ca.pem" -nhnv
