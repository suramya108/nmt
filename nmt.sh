#!/bin/bash
/usr/sbin/tcpdump  -c 1000 -n -e > capture.txt

grep -i "arp" capture.txt > ARP.txt

cut -d " " -f1 ARP.txt>arp_timestamp.txt
cut -d " " -f2 ARP.txt>arp_SMAC.txt
cut -d " " -f16 ARP.txt>arp_len.txt
cut -d " " -f4 ARP.txt>arp_dmac1.txt
cut -d "," -f1 arp_dmac1.txt>arp_DMAC.txt
cut -d " " -f12 ARP.txt>arp_SIP.txt
cut -d "," -f1 arp_dip1.txt>arp_DIP.txt
cut -d " " -f14 ARP.txt>arp_dip1.txt
paste arp_timestamp.txt arp_len.txt arp_SMAC.txt arp_DMAC.txt arp_SIP.txt arp_DIP.txt > all_ARP.txt


grep -i "udp" capture.txt > UDP.txt

cut -d " " -f1 UDP.txt>udp_timestamp.txt
cut -d " " -f2 UDP.txt>udp_SMAC.txt
cut -d " " -f4 UDP.txt>udp_dmac1.txt
cut -d "," -f1 udp_dmac1.txt>udp_DMAC.txt
cut -d " " -f9 UDP.txt>udp_len1.txt
cut -d ":" -f1 udp_len1.txt>udp_len.txt
cut -d " " -f10 UDP.txt>udp_sip1.txt
cut  -b1-11 udp_sip1.txt>udp_SIP.txt
cut  -b13-16 udp_sip1.txt>udp_port1.txt
cut -d " " -f12 UDP.txt>udp_dip1.txt
cut -b1-15 udp_dip1.txt>udp_DIP.txt
cut -b17-20 udp_dip1.txt>udp_port2.txt
paste udp_timestamp.txt udp_len.txt udp_SMAC.txt udp_DMAC.txt udp_SIP.txt udp_DIP.txt udp_port1.txt udp_port2.txt > all_UDP.txt


grep -i "tcp" capture.txt > TCP.txt

cut -d " " -f1 TCP.txt>tcp_timestamp.txt
cut -d " " -f2 TCP.txt>tcp_SMAC.txt
cut -d " " -f4 TCP.txt>tcp_dmac1.txt
cut -d "," -f1 tcp_dmac1.txt>tcp_DMAC.txt
cut -d " " -f9 TCP.txt>tcp_len1.txt
cut -d ":" -f1 tcp_len1.txt>tcp_len.txt
cut -d " " -f10 TCP.txt>tcp_sip1.txt
cut  -b1-13 tcp_sip1.txt>tcp_SIP.txt
cut -d " " -f12 TCP.txt>tcp_dip1.txt
cut  -b1-11 tcp_dip1.txt>tcp_DIP.txt
cut  -b15-18 tcp_sip1.txt>tcp_port1.txt
cut  -b13-16 tcp_dip1.txt>tcp_port2.txt
paste tcp_timestamp.txt tcp_len.txt tcp_SMAC.txt tcp_DMAC.txt tcp_SIP.txt tcp_DIP.txt tcp_port1.txt tcp_port2.txt > all_TCP.txt





