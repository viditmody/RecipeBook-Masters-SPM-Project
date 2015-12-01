/*************************************************************************
 * Copyright (c) Metabiota Incorporated - All Rights Reserved
 * ------------------------------------------------------------------------
 * This material is proprietary to Metabiota Incorporated. The
 * intellectual and technical concepts contained herein are proprietary
 * to Metabiota Incorporated. Reproduction or distribution of this
 * material, in whole or in part, is strictly forbidden unless prior
 * written permission is obtained from Metabiota Incorporated.
 * ***********************************************************************
 * <p/>
 * Created by WLao on 11/12/15.
 */
package com.recipe.rest.service.rank;

import com.fasterxml.jackson.databind.MapperFeature;
import com.fasterxml.jackson.databind.ObjectMapper;
import com.recipe.rest.common.View;
import com.recipe.rest.common.enums.ServiceOperation;
import com.recipe.rest.common.enums.StatusEnum;
import com.recipe.rest.dto.Rank;
import com.recipe.rest.entity.RankDO;
import org.apache.commons.collections.CollectionUtils;
import org.springframework.beans.BeanUtils;
import org.springframework.stereotype.Component;

import java.util.ArrayList;
import java.util.Collections;
import java.util.Iterator;
import java.util.List;

@Component
public class RankMapper {
    public RankDO mapToDO(Rank rankDTO, ServiceOperation serviceOperation) {
        RankDO rankDO = new RankDO();
        String[] ignoreProperties = { "status" };
        BeanUtils.copyProperties(rankDTO, rankDO, ignoreProperties);
        if (rankDTO.getStatus() != null)
            rankDO.setStatus(mapToStatusId(rankDTO.getStatus()));
        return rankDO;
    }

    public Rank mapToDTO(RankDO rankDO, ServiceOperation serviceOperation) throws Exception {
        Rank rankDTO = new Rank();
        String[] ignoreProperties = { "status" };
//        BeanUtils.copyProperties(rankDTO, rankDO);
        BeanUtils.copyProperties(rankDO, rankDTO, ignoreProperties);
        if (rankDO.getStatus() != null)
            rankDTO.setStatus(mapToStatusName(rankDO.getStatus()));
        return serializer(rankDTO, serviceOperation);
    }

    public List<Rank> mapToDTO(List<RankDO> rankDOList, ServiceOperation serviceOperation) throws Exception {
        if (CollectionUtils.isEmpty(rankDOList)) return Collections.emptyList();
        List<Rank> userList = new ArrayList<Rank>(rankDOList.size());
        Iterator<RankDO> rankDOListItr = rankDOList.iterator();
        String[] ignoreProperties = { "status" };
        while (rankDOListItr.hasNext()) {
            RankDO rankDO = rankDOListItr.next();
            Rank rankDTO = new Rank();
            BeanUtils.copyProperties(rankDO, rankDTO, ignoreProperties);
            if (rankDO.getStatus() != null)
                rankDTO.setStatus(mapToStatusName(rankDO.getStatus()));
            rankDTO = serializer(rankDTO, serviceOperation);
            userList.add(rankDTO);
        }
        return userList;
    }

    private Integer mapToStatusId(String statusName) {
        if (statusName.equalsIgnoreCase(StatusEnum.ACTIVE.getName())) {
            return StatusEnum.ACTIVE.getId();
        } else if (statusName.equalsIgnoreCase(StatusEnum.DEACTIVATED.getName())) {
            return StatusEnum.DEACTIVATED.getId();
        } else if (statusName.equalsIgnoreCase(StatusEnum.DELETED.getName())) {
            return StatusEnum.DELETED.getId();
        }
        return null;
    }

    private String mapToStatusName(int statusId) {
        if (statusId == StatusEnum.ACTIVE.getId()) {
            return StatusEnum.ACTIVE.getName();
        } else if (statusId == StatusEnum.DEACTIVATED.getId()) {
            return StatusEnum.DEACTIVATED.getName();
        } else if (statusId == StatusEnum.DELETED.getId()) {
            return StatusEnum.DELETED.getName();
        }
        return null;
    }

    private Rank serializer(Rank rankDTO, ServiceOperation serviceOperation) throws Exception {
        ObjectMapper objectMapper = new ObjectMapper();
        objectMapper.disable(MapperFeature.DEFAULT_VIEW_INCLUSION);
        String strOutput;
        if (serviceOperation != null) {
            if (serviceOperation.equals(ServiceOperation.ADD))
                strOutput = objectMapper.writerWithView(View.PostResponse.class).writeValueAsString(rankDTO);
            else if (serviceOperation.equals(ServiceOperation.GET))
                strOutput = objectMapper.writerWithView(View.GetResponse.class).writeValueAsString(rankDTO);
            else
                strOutput = objectMapper.writeValueAsString(rankDTO);
        } else {
            strOutput = objectMapper.writeValueAsString(rankDTO);
        }
        Rank newRankDTO = objectMapper.readValue(strOutput, rankDTO.getClass());
        return newRankDTO;
    }
}
