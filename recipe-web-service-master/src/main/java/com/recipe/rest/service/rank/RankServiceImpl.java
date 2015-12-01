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

import com.recipe.rest.common.enums.ServiceOperation;
import com.recipe.rest.dao.rank.RankDAO;
import com.recipe.rest.dto.Rank;
import com.recipe.rest.entity.RankDO;
import lombok.Setter;
import org.apache.commons.collections.CollectionUtils;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import org.springframework.transaction.annotation.Transactional;

import javax.ws.rs.WebApplicationException;
import javax.ws.rs.core.Response;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

@Transactional
@Service
public class RankServiceImpl implements RankService{
    @Autowired
    @Setter
    private RankDAO rankDAO;

    @Autowired
    @Setter
    private RankMapper mapper;

    @Override
    public Rank findById(Integer id) throws Exception {
        RankDO rankDO = rankDAO.find(id);
        if (rankDO == null) throw new WebApplicationException(Response.Status.NOT_FOUND); //TODO move to abstract/base
        Rank rankDTO = mapper.mapToDTO(rankDO, ServiceOperation.GET);
        return rankDTO;
    }

    @Override
    public Map<String, List<Rank>> findAll() throws Exception {
        List<RankDO> rankDOList = rankDAO.findAll();
        List<Rank> rankDTOList = mapper.mapToDTO(rankDOList, ServiceOperation.GET);
        Map<String, List<Rank>> map = new HashMap<String, List<Rank>>();
        if (CollectionUtils.isEmpty(rankDTOList)) return map;
        map.put(getPluralizeJsonRootName(constructJsonRoot(rankDTOList.get(0).getClass())), rankDTOList); //TODO move to abstract/base
        return map;
    }

    @Override
    public Rank add(Rank rankDTO) throws Exception {
        //validate DTO
        if (rankDTO == null) throw new WebApplicationException(Response.Status.BAD_REQUEST); //TODO move to abstract/base
        rankDTO.setId(null);
        RankDO rankDO = mapper.mapToDO(rankDTO, ServiceOperation.ADD);
        rankDO = rankDAO.save(rankDO);
        return mapper.mapToDTO(rankDO, ServiceOperation.ADD);
    }

    @Override
    public void update(Integer id, Rank rankDTO) throws Exception {
        if (rankDTO == null) throw new WebApplicationException(Response.Status.BAD_REQUEST); //TODO move to abstract/base
        rankDTO.setId(id);
        //validate DTO
        RankDO oldDo = rankDAO.find(id);
        if (oldDo == null) throw new WebApplicationException(Response.Status.BAD_REQUEST); //TODO move to abstract/base
        RankDO toUpdateDO = mapper.mapToDO(rankDTO, ServiceOperation.UPDATE);
        RankDO updatedDO = rankDAO.merge(toUpdateDO);
        if (updatedDO == null) throw new WebApplicationException(Response.Status.BAD_REQUEST); //TODO move to abstract/base
    }

//    @Override
//    public void delete(Integer id) throws Exception {
//        if (id == null || id <= 0) throw new WebApplicationException(Response.Status.BAD_REQUEST); //TODO move to abstract/base
//        if (rankDAO.find(id) == null) throw new WebApplicationException(Response.Status.BAD_REQUEST); //TODO move to abstract/base
//        rankDAO.delete(id);
//    }

    private String getPluralizeJsonRootName(String rootName) {
        return rootName + "s";
    }

    private String constructJsonRoot(Class dtoClass) {
        String className = dtoClass.getSimpleName();
        return className.substring(0,1).toLowerCase() + className.substring(1);
    }
}
